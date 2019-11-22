<blockquote>
    <div class="callout">
        <div class="icon purple">
            <img src="{{ asset('img/lightbulb.min.svg')}}">
        </div>
        <p class="content">
            @auth
                El usuario <code class="language-php">{{auth()->user()->name}}</code> cuenta con el rol <code class="language-php">
                    @foreach(auth()->user()->roles as $role)
                        {{$role->name}}
                    @endforeach
                    </code>
            @endauth

            @guest
                El email es: <code class="language-php">admin123@email.com</code> y la contraseña es: <code class="language-php">password</code>
            @endguest

        </p>
    </div>
</blockquote>

