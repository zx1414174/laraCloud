<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>图片直播 - 详情</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <link rel="stylesheet" type="text/css" href="{{asset('chatroom/assert/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('chatroom/assert/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('chatroom/assert/iconfont/iconfont.css')}}">
    <link rel="shortcut icon" href="{{asset('chatroom/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('chatroom/assert/css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('js/vue/vue.js')}}">
</head>

<body>
<header class="header xxl-font">
    <i class="icon iconfont icon-fanhui back" id="back"></i>
    马刺vs火箭赛况
    <!--用户处于登录状态时，将该按钮隐藏-->
    <a href="./login.html">
        <i class="icon iconfont icon-wode my"></i>
    </a>
</header>
<div class="content">
    <div class="poster">
        <img src="{{asset("chatroom/imgs/match-poster.png")}}" class="post-img" />
        <div class="poster-title">
            <div class="poster-title-team">
                <img src="{{asset("chatroom/imgs/team1.png")}}" width="40px" height="40px">
                <div>马刺(50)</div>
            </div>
            <div>VS</div>
            <div class="poster-title-team">
                <img src="{{asset("chatroom/imgs/team2.png")}}" width="40px" height="40px">
                <div>火箭(52)</div>
            </div>
        </div>
    </div>
    <div class="tab-nav">
        <div>赛况</div>
        <div class="active" >聊天室</div>
        <div>数据</div>
    </div>
    <div class="tab-block">
        <div id="match-result" class="hidden">
            <div class="frame">
                <h3 class="frame-header">
                    <i class="icon iconfont icon-shijian"></i>第一节 01：30
                </h3>
                <div class="frame-item">
                    <span class="frame-dot"></span>
                    <div class="frame-item-author">
                        <img src="{{asset("chatroom/imgs/team1.png")}}" width="20px" height="20px" /> 马刺
                    </div>
                    <p>08:44 暂停 常规暂停</p>
                    <p>08:44 帕克 犯规 个人犯规 2次</p>
                </div>
                <div class="frame-item">
                    <span class="frame-dot"></span>
                    <div class="frame-item-author">
                        singwa(评论员)
                    </div>
                    <p>01:44 </p>
                    <p>01:46 犯规 个人犯规 Ruan</p>
                </div>
            </div>
            <div class="frame">
                <h3 class="frame-header">
                    <i class="icon iconfont icon-shijian"></i>第二节 01：40
                </h3>
                <div class="frame-item">
                    <span class="frame-dot"></span>
                    <div class="frame-item-author">
                        <img src="{{asset("chatroom/imgs/team2.png")}}" width="20px" height="20px" /> 火箭
                    </div>
                    <p>比赛如火如荼~~~</p>
                    <p>
                        <img src="{{asset("chatroom/imgs/1.png")}}" width="40%" />
                    </p>
                </div>
                <div class="frame-item">
                    <span class="frame-dot"></span>
                    <div class="frame-item-author">
                        singwa(评论员)
                    </div>
                    <p>08:44:41 火箭队请求暂停 常规暂停</p>
                    <p>08:44:40 哈登进攻犯规 个人犯规3次</p>
                </div>
            </div>
        </div>
        <div id="comments" class="comments">
            <div class="comment" v-for="comment in comments">
                <span>@{{ comment.userName }}</span>
                <span>:</span>
                <span>@{{ comment.content }}</span>
            </div>
            <div class="comment-form">
                <input type="text"  v-model="commentMessage" v-on:click="clearMessage" @keyup.enter="threadPoxi"></input>
            </div>
        </div>
        <div id="match-data" class="hidden match-data">
            <div class="match-score">
                <div class="match-team-info">
                    <img src="{{asset("chatroom/imgs/team1.png")}}" width="40px" height="40px" />
                    <div>火箭</div>
                </div>
                <div class="match-score-result">
                    <div style="font-size: .8rem;color: red;">第一小节 01：40</div>
                    <div style="font-size: 1.2rem; color:red;">
                        <span>21</span>
                        <span>Live</span>
                        <span>22</span>
                    </div>
                    <div style="font-size: .8rem; color:#888;">NBA常规赛</div>
                </div>
                <div class="match-team-info">
                    <img src="{{asset("chatroom/imgs/team2.png")}}" width="40px" height="40px" />
                    <div>雷霆</div>
                </div>
            </div>
            <div class="match-report">
                <h3 class="sub-title">赛况</h3>
                <div class="match-report-row row-title">
                    <span>球队</span>
                    <span>1TH</span>
                    <span>2TH</span>
                    <span>3TH</span>
                    <span>4TH</span>
                    <span>总分</span>
                </div>
                <div class="match-report-row">
                    <span><img src="{{asset("chatroom/imgs/team1.png")}}" width="30px" height="30px" /></span>
                    <span>20</span>
                    <span>-</span>
                    <span>-</span>
                    <span>20</span>
                    <span>40</span>
                </div>
                <div class="match-report-row">
                    <span>
                        <img src="{{asset("chatroom/imgs/team2.png")}}" width="30px" height="30px" />
                    </span>
                    <span>15</span>
                    <span>-</span>
                    <span>-</span>
                    <span>30</span>
                    <span>40</span>
                </div>
            </div>
            <div class="mvp">
                <h3 class="sub-title">本场最佳</h3>
                <div>
                    <div class="mvp-player">
                        <img src="{{asset("chatroom/imgs/pa.png")}}" width="50px;" height="40px" />
                        <div class="mvp-player-info">
                            <div>9</div>
                            <div>帕克</div>
                        </div>
                    </div>
                    <div class="mvp-score">
                        <span>10</span>
                        <span class="mvp-score-label">得分</span>
                        <span>12</span>
                    </div>
                    <div class="mvp-player">
                        <div class="mvp-player-info">
                            <div>13</div>
                            <div>哈登</div>
                        </div>
                        <img src="{{asset("chatroom/imgs/ha.png")}}" width="50px;" height="40px" />
                    </div>
                </div>
                <div>
                    <div class="mvp-player">
                        <img src="{{asset("chatroom/imgs/pa.png")}}" width="50px;" height="40px" />
                        <div class="mvp-player-info">
                            <div>9</div>
                            <div>帕克</div>
                        </div>
                    </div>
                    <div class="mvp-score"><span>10</span><span class="mvp-score-label">助攻</span><span>9</span></div>
                    <div class="mvp-player">
                        <div class="mvp-player-info">
                            <div>3</div>
                            <div>保罗</div>
                        </div>
                        <img src="{{asset("chatroom/imgs/bao.png")}}" width="50px;" height="40px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{asset('js/vue/vue.js')}}"></script>
<script type="text/javascript">
    new Vue({
        el: '.content',
        data: {
            websock: null,
            commentMessage : "别憋着，说点啥~~ 回车既发射",
            comments: [
                {
                    "userName" : "系统",
                    "content" : "欢迎您进入聊天室"
                }
            ]
        },
        methods: {
            clearMessage() {
                this.commentMessage = '';
            },
            getSendMessageData(){
                var sent_data = {
                    "authorization_token" : "",
                    "message": "",
                };
                sent_data.message = this.commentMessage;
                return sent_data;
            },
            setCookie (c_name, value, expiredays) {
                var exdate = new Date();
                exdate.setDate(exdate.getDate() + expiredays);
                document.cookie = c_name + "=" + encodeURI(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
            },
            threadPoxi(){  // 实际调用的方法
                //参数
                const agentData = [
                    "chatroom/message",
                ];
                agentData.push(this.getSendMessageData())
                //若是ws开启状态
                if (this.websock.readyState === this.websock.OPEN) {
                    this.websocketsend(agentData)
                }
                // 若是 正在开启状态，则等待300毫秒
                else if (this.websock.readyState === this.websock.CONNECTING) {
                    let that = this;//保存当前对象this
                    setTimeout(function () {
                        that.websocketsend(agentData)
                    }, 300);
                }
                // 若未开启 ，则等待500毫秒
                else {
                    this.initWebSocket();
                    let that = this;//保存当前对象this
                    setTimeout(function () {
                        that.websocketsend(agentData)
                    }, 500);
                }
            },
            initWebSocket(){ //初始化weosocket
                //ws地址
                const wsuri = "ws://192.168.5.250:2222";
                this.websock = new WebSocket(wsuri);
                this.websock.onmessage = this.websocketonmessage;
                this.websock.onclose = this.websocketclose;
            },
            websocketonmessage(e){ //数据接收
                //const redata = JSON.parse(e);
                console.log(e);
            },
            websocketsend(agentData){//数据发送
                this.websock.send(JSON.stringify(agentData));
            },
            websocketclose(e){  //关闭
                console.log("connection closed (" + e.code + ")");
            },
            getCookie(name) {
                var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
                if (arr = document.cookie.match(reg))
                    return (arr[2]);
                else
                    return null;
            }
        },
        created(){
            this.initWebSocket()
        },
    })
</script>
</html>