<?php
/**
 * 返回处理类
 */

namespace App\Http\Common\Tools\Common;


class HttpResponse
{
    /*
     * $response 类
     * @var \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory $response
     */
    protected $response;
    /*
     * @var string 状态码字段名
     */
    protected $status_code_field_name = 'statusCode';
    public function __construct()
    {
        $this->response = response();
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
        $closure($this->response);
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
    public function success($msg = '成功', $code = 200)
    {
        return $this->message($msg, $code);
    }

    /**
     * 失败返回
     * @param string $msg
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function error($msg = '失败', $code = 400)
    {
        return $this->message($msg, $code);
    }

    /**
     * 统一信息返回
     * @param $msg
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function message($msg, $code)
    {
        return $this->response->json([
            $this->status_code_field_name => $code,
            'message' => $msg,
        ]);
    }

    /**
     * @param $data
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     * @author:pyh
     * @time:2018/5/25
     */
    public function data($data, $code = 200)
    {
        return $this->response->json([
            $this->status_code_field_name => $code,
            'data' => $data,
        ]);
    }


}