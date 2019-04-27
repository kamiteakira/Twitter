<!doctype html>
<html lang="ja">
<head>
<title>@yield('title')</title>
<style>
* {
margin:0; padding:0; 	/*全要素のマージン・パディングをリセット*/
line-height:1.5;	/*全要素の行の高さを1.5倍にする*/
color:#808080;		/*文字色*/
}
body {
background-color:#f0ffff;	/*ページ全体の背景色*/
text-align:center;		/*IE6以下でセンタリングするための対策*/
}
div#pagebody {
width:796px; margin:0 auto;	/*内容全体をセンタリング*/
text-align:left;	/*テキストの配置を左揃えにする*/
background-color:#f0ffff;		/*内容全体の背景色*/
}

.header {
  background-color: #f0f8ff;
  font-weight:bold;
}

.header a {
  text-decoration: none;
}
.header a:hover {
  color:#2ca9e1;
}

ul#menu {
height:42px; background-color:#fff; font-weight:bold;
box-shadow: 2px 2px 2px #dcdcdc;
}
li#menu01,li#menu02,li#menu03,li#menu04,li#menu05 {
float:left;			/*リスト項目を横に並べる*/
display:inline;			/*リスト項目をインライン表示にする*/
list-style-type:none;
}

ul#menu li a:hover {
  color:#2ca9e1;
}

li#menu01 {
width:164px; height:42px;
}
li#menu02 {
width:156px; height:42px;
}
li#menu03 {
width:156px; height:42px;
}
li#menu04 {
width:156px; height:42px;
}
li#menu05 {
width:164px; height:42px;
background-color: skyblue;
}
ul#menu a {
display:block;
height:42px; padding-top:4px; text-align:center;
text-decoration:none; 			/*リンクの下線を無くす*/
font-family:Arial, Helvetica, sans-serif;	/*フォントの種類*/
}
.tweetbtn {
  color: white;
}

.content {
  background-color: #fff;
  border: 10px;
  margin-top: 10px;
  box-shadow: 2px 2px 4px gray;
  border: solid #f0f8ff;
}

.content h1 {
  font-size: 20px;
  border-left: solid blue;
  margin-top: 10px;
  margin-left: 20px;
  padding-left: 10px;
  margin-bottom: 10px;
}

.content table {
  width: 300px;
}

.content table td a:hover {
  color:#2ca9e1;
}

.content a :hover{
  color:#2ca9e1;
}

.content table {
  margin-left: 30px;
}

.content table textarea{
  font-size: 20px;
  width: 500px;
  height: 150px;
  margin: auto;
}

.content table th {
  text-align: left;
  padding-bottom: 20px;
}

.content table td{
  padding-bottom: 20px;
}

/* フレンド一覧 */
.name {
  text-align: center;
  padding-right: 20px;
}

/* タイムライン画面 */
.tweet {
  margin-left: 20px;
  margin-right: 20px;
  margin-bottom: 10px;
  border: solid 1px #d3d3d3;
  border-radius: 1em;
}

.tweettime {
  font-size: 5px;
  text-align: right;
  padding-right: 5px;
  color: #dcdcdc;
}

.tweetmessage {
  font-size: 15px;
  font-family: sans-serif;
  padding: 8px;
}

/* ツイート画面 */
.followbutton {
  padding-left: 20px;
}

/* マイページ */
.followbox{
  float: left;
  width: 370px;
  padding: 10px;
}

</style>
</head>
<body>
<div id="pagebody">
  <div class="header">
    @if(Auth::check())
    <?php
    $data = Auth::user()->name;
     ?>
    <p>{{$data}}さんがログインしています</p>
    @else
    <p>ログインできていません</p>
    @endif
  </div>
<ul id="menu">
		<li id="menu01"><a href="/twitter">Home</a></li>
		<li id="menu02"><a href="/twitter/mypage">MyPage</a></li>
		<li id="menu03"><a href="/twitter/friends">Friends</a></li>
    @if( Auth::check() )
    <li id="menu04"><a href="/twitter/logout">Logout</a></li>
    @else
    <li id="menu04"><a href="/twitter/login">Login</a></li>
    @endif
		<li id="menu05"><a href="/twitter/tweet" class="tweetbtn">Tweet</a></li>
	</ul>
<div class="content">
  @yield('contents')
</div>

<figure class='followbox'>
  @yield('contents_sub1')
</figure>
<figure class="followbox">
  @yield('contents_sub2')
</figure>

<div class="footer">
  @yield('footer')
</div>

</div>
</body>
</html>
