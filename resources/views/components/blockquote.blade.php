<blockquote>
    <div class="callout">
        <div class="icon purple">
            <img src="{{ asset('img/lightbulb.min.svg')}}">
        </div>
        <p class="content">
           @auth
                @role('SuperAdmin')
                Rol <code class="language-php">Administrator</code> acceso total

                 @else
                Rol <code class="language-php"></code> acceso limitado
                @endhasrole
            @endauth

            @guest
                   El email es: <code class="language-php">admin123@email.com</code> y la contraseña es: <code class="language-php">password</code>
                @endguest

        </p>
    </div>
</blockquote>

