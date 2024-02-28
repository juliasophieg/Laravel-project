<div>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <label for="name">Name...</label>
        <input type="name" id="name" name="name">

        <label for="email">Email...</label>
        <input type="email" id="email" name="email">

        <label for="password">Password...</label>
        <input type="password" id="password" name="password">
        <button type="submit">Register</button>
    </form>
</div>
