<x-navbar>
    <x-slot:popup></x-slot:popup>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Vast+Shadow&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

        .section__title {
            font-family: "Vast Shadow", serif;
            color: #1b262c;
            font-weight: 400;
            font-size: 3em;
            text-align: center
        }

        .cover_title {
            font-family: "Bebas Neue", sans-serif;
            color: #e07b39;
            margin-top: 10vh;
            text-align: center;
            font-size: 4em;
        }

        .shop__container {
            margin-left: 7vw;
            margin-top: 10vw;
            grid-template-columns: repeat(2, 1fr);
            gap: 6rem 1.5rem;
            display: inline-flex;
        }

        .shop__card {
            position: relative;
            background: linear-gradient(to bottom, #ffffd0, #f3ccff, #d09cfa, #a555ec);
            padding: 10.75rem 7rem 1.25rem 7rem;
            border-radius: 1rem;
            box-shadow: rgba(0, 0, 0, 0.1);
        }

        .shop__img {
            position: absolute;
            top: -8rem;
            left: 0;
            right: 0;
            width: 270px;
            margin: 0 auto;
            transition: transform 0.4s;
        }

        .shop__title {
            font-family: "Mate SC", serif;
            font-size: large;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #4f1787;
        }

        .shop__price {
            color: #5d0e41;
            font-weight: 600;
            font-size: medium;
        }

        .shop__button {
            position: absolute;
            right: 0.75rem;
            bottom: 0.75rem;
            outline: none;
            border: none;
            background-color: var(--primary-neon-orange);
            padding: 6px;
            border-radius: 50%;
            font-size: 1.25rem;
            display: grid;
            cursor: pointer;
        }

        .shop__card:hover .shop__img {
            transform: translateY(-0.5rem);
        }

        .control-group {
            display: none;
        }

        .cover {
            margin-top: 11em;
            background-image: url("{{ asset('storage/img/teaa.png') }}");
            /* The image used */
            height: 500px;
            /* You must set a specified height */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Do not repeat the image */
            background-size: cover;
            /* Resize the background image to cover the entire container */
        }

        .cover_par {
            font-family: "Montserrat", sans-serif;
            color: #333333;
            font-weight: bold;
            text-align: center;
        }

        .promo {
            font-family: "Kosugi Maru", sans-serif;
            margin-top: 8vh;
            text-align: center;
            margin-bottom: 1rem;
            border: 2px solid black;

        }

        .center {
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
    <x-slot:title></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>


    <div class="nk-block">
        <section class="shop section" id="shop">
            <h2 class="section__title">
                THE BEST TEAS
            </h2>

            <div class="shop__container container grid">
                <article class="shop__card">
                    <img src="{{ asset('storage/img/lavender.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Lavender Tea</h3>
                    <span class="shop__price">Rp23.000,00</span>

                    <button class="shop__button" onclick="location.href='{{ route('menu') }}'">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

                <article class="shop__card">
                    <img src="{{ asset('storage/img/lemon.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Lemon Tea</h3>
                    <span class="shop__price">Rp25.000,00</span>

                    <button class="shop__button" onclick="location.href='{{ route('menu') }}'">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

                <article class="shop__card">
                    <img src="{{ asset('storage/img/chamomile.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Chamomile Tea</h3>
                    <span class="shop__price">Rp26.000,00</span>

                    <button class="shop__button">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

            </div>
        </section>
        <section class="section cover">
            <h1 class="cover_title">Jelajahi Cita Rasa Teh Kami</h1>
            <p class="cover_par">TeaJam: Tempat Nongkrong Favorit Baru Kamu. </p>
            <p class="cover_par">Baik kamu seorang pecinta teh atau baru memulai perjalanan, <br>
                kami punya perpaduan teh sempurna yang menanti kamu. </p>
            <div class="center"><button onclick="location.href='{{ route('menu') }}'" class="btn promo">Order Sekarang
                    &#8594;</button></div>

        </section>
    </div>

</x-navbar>
