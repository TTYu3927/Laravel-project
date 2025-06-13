<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateForm</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f4f4f4;
            }
            h1 {
                color: #333;
                text-align: center;
            }
            form {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                margin: auto;
            }
            input[type="text"] {
                padding: 10px;
                margin: 5px 0 20px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
                width: 100%;
                box-sizing: border-box;
            }
            button {
                background-color: #007BFF;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background-color: #0056b3;
            }
            .button {
                display: inline-block;
                padding: 10px 15px;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            
            
        </style>
</head>
<body>
    <h1>Edit User</h1>
    <form action="/users/update/{{($user->id)}}" method="POST">
        @csrf
        Name: <input type="text" name="name" value="{{ $user->name }}" required><br><br>
        
        Email: <input type="text" name="email" value="{{ $user->email }}" required><br><br>
        
        Password: <input type="text" name="password" value="{{ $user->password }}" required><br><br>
        
        <button type="submit">Update</button>
</body>
</html>