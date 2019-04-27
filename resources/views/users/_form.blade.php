<?php
    $name = "";
    $email = "";
    $id = "";
    if(!empty($user->name)) {
        $name = $user->name;
    }

    if (!empty($user->email)) {
        $email = $user->email;
    }

    if (!empty($user->id)) {
        $id = $user->id;
    }
?>

<table class="table" style="border:solid 1px #dee2e6;">
    <tbody class="thead-dark">
      <tr>
        <th scope="col">名前</th>
        <td><input type="text" class="form-control" name="user_name" value="{{ $name }}"></td>
      </tr>
      <tr>
        <th scope="col">メール</th>
        <td><input type="text" class="form-control" name="user_email" value="{{ $email }}"></td>
      </tr>
    </tbody>
</table>
<input name="id" type="hidden" value="{{ $id }}">
