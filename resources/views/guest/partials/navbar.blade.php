<nav class="navelle-navbar">
    <a href="/" class="navelle-brand">Navelle</a>

    <div class="navelle-nav-links">
        <a href="/">Home</a>
        <a href="/contact">Contact Us</a>
        <a href="/auth">Login</a>
    </div>
</nav>

<style>
    .navelle-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        padding: 18px 6%;
        background: #ffffff;
        border-bottom: 1px solid #f5d5e1;
    }

    .navelle-brand {
        color: #c46786;
        font-size: 27px;
        font-weight: bold;
        text-decoration: none;
        letter-spacing: 1px;
    }

    .navelle-nav-links {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .navelle-nav-links a {
        color: #51454a;
        font-size: 15px;
        text-decoration: none;
    }

    .navelle-nav-links a:hover {
        color: #c46786;
    }

    @media (max-width: 480px) {
        .navelle-navbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .navelle-nav-links {
            flex-wrap: wrap;
            gap: 16px;
        }
    }
</style>
