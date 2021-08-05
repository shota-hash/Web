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
    <input type="text" name="content" class="contain_wrapper">
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
                <td>{{$item->created_at}}</td>
            　  <td class="table-text">
            　　    <input type="text" name="content" class="contain_wrapper" value={{      $item->content}}>
            　  </td>
                <form action="/todo/update" method="POST" class="edit">
                @csrf
                <td><input type="submit" value="更新" class="contain_button_edit"></td>
                </form>
                <form action="/todo/delete" method="POST" class="delete">
                @csrf
                <td>
                <input type="submit" value="削除" class="contain_button_delete"></td>
                </form>
            </tr>
            @endforeach
        </tr>
    </table>
  </div>
</div>
</body>
</html>