<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>
<style>
  html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
    margin:0;
    padding:0;
    border:0;
    outline:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

body {
    line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
    display:block;
}

nav ul {
    list-style:none;
}

blockquote, q {
    quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content:'';
    content:none;
}

a {
    margin:0;
    padding:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

/* change colours to suit your needs */
ins {
    background-color:#ff9;
    color:#000;
    text-decoration:none;
}

/* change colours to suit your needs */
mark {
    background-color:#ff9;
    color:#000;
    font-style:italic;
    font-weight:bold;
}

del {
    text-decoration: line-through;
}

abbr[title], dfn[title] {
    border-bottom:1px dotted;
    cursor:help;
}

table {
    border-collapse:collapse;
    border-spacing:0;
}

/* change border colour to suit your needs */
hr {
    display:block;
    height:1px;
    border:0;  
    border-top:1px solid #cccccc;
    margin:1em 0;
    padding:0;
}

input, select {
    vertical-align:middle;
}
* {
    box-sizing: border-box;
}
.all {
    background-color: #2d197c;
    height: 100vh;
    width: 100vw;
    position: relative;
}
.content {
    background-color: white;
    width: 50vw;
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
}
.content_wrapper {
    font-weight: bold;
    font-size: 25px;
    margin-bottom: 10px;
}
.contain {
    margin-bottom: 30px;
    display: flex;
}
.contain_wrappers {
    width: 70%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 15px;
}
.contain_button {
    text-align: left;
    border: 2px solid #dc70fa;
    font-size: 12px;
    color: #dc70fa;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    margin-left: 30px;
}
table {
    text-align: center;
    width: 100%;
}
th {
    font-weight: bold;
}
tr {
    height: 50px;
}
.contain_wrapper {
    width: 90%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
}
.contain_button_edit {
    text-align: left;
    border: 2px solid #fa9770;
    font-size: 12px;
    color: #fa9770;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
}
.contain_button_delete {
    text-align: left;
    border: 2px solid #71fadc;
    font-size: 12px;
    color: #71fadc;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
}




</style>
<body>
<div class="all">
    <div class="content">
    <p class="content_wrapper">Todo List</p>
    @if(count($errors)>0)
    <ul>
    @foreach($errors->all() as $error)
    <li>
    {{$error}}
    </li>
    @endforeach
    </ul>
    @endif
    <form action="/todo/create" method="POST" class="contain">
    @csrf
    <input type="text" name="content" class="contain_wrappers">
    <input type="submit" value="追加" class="contain_button">
    </form>
    <table>
        <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
        </tr>
            @foreach ($items as $item)
            <tr>
                <form action="/todo/update" method="POST" class="update">
                @csrf
                <td>{{$item->created_at}}</td>
            　   <td class="big">
            　　    <input type="text" name="content" class="contain_wrapper" value={{$item->content}}>
            <input type="hidden" name="id" value={{$item->id}}>
            　   </td>
                <td>
                    <button class="contain_button_edit">更新</button>
                </td>
                </form>
                <td><form action='/todo/delete'method="POST" class="delete">
                @csrf
                <input type="hidden" name="id" value={{$item->id}}>
                <button class="contain_button_delete">削除</button></td>
                </form></td>
            </tr>
            @endforeach
        </tr>
    </table>
  </div>
</div>
</body>
</html>