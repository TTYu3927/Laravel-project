<div>
    <h1>Login</h1>
    <form method="POST" action="login">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="text" name="user" placeholder="name" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="password" required>
        </div>
        <button type="submit">Login</button>
</div>