<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>oauth</title>
</head>
<body>
    {{ $authParams['client']->getName() }}

    <form method="post">
        <input type="submit" value="Approve" name="approve">
        <input type="submit" value="Deny" name="deny">
        {{ Form::token() }}
    </form>
</body>
</html>