<?php
/**
 * 统一返回公共trait
 */

namespace App\Http\Common\Traits;


use App\Http\Common\Enums\HttpResponseEnum;

trait HttpResponseTrait
{
    /*
     * $response 类
     * @var \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory $response
     */
    protected $response;
    /*
     * @var string 状态码字段名
     */
    protected $status_code_field_name = HttpResponseEnum::RESPONSE_CODE_FIELD_NAME;

    /**
     * 获取返回函数
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @author pyh
     * @time 2018/6/11h
     */
    protected function getResponse()
    {
        if (!$this->response) {
            $this->response = response();
        }
        return $this->response;
    }

    /**
     * 设置response参数
     * @param \Closure $closure
     * @return $this
     * @author:pyh
     * @time:2018/5/25
     */
    public function setResponse(\Closure $closure)
    {
        $response = $this->getResponse();
        $closure($response);
        return $this;
    }

    /**
     * 成功返回数据
     * @param string $msg
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function responseSuccess($msg = '成功', $code = HttpResponseEnum::SUCCESS)
    {
        return $this->responseMessage($msg, $code);
    }

    /**
     * 失败返回
     * @param string $msg
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function responseError($msg = '失败', $code = HttpResponseEnum::ERROR)
    {
        return $this->responseMessage($msg, $code);
    }

    /**
     * 统一信息返回
     * @param $msg
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function responseMessage($msg, $code)
    {
        $response = $this->getResponse();
        return $response->json([
            $this->status_code_field_name => $code,
            HttpResponseEnum::RESPONSE_MESSAGE_FIELD_NAME => $msg,
        ]);
    }

    /**
     * data数据返回
     * @param $data
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function responseData($data, $code = HttpResponseEnum::SUCCESS)
    {
        $response = $this->getResponse();
        return $response->json($this->withResponseData($data, $code));
    }

    /**
     * data模式返回数据
     * @param $data
     * @param $code
     * @return array
     * @author pyh
     * @time 2018/7/19
     */
    public function withResponseData($data, $code)
    {
        return [
            $this->status_code_field_name => $code,
            HttpResponseEnum::RESPONSE_DATA_FIELD_NAME => $data,
        ];
    }
}