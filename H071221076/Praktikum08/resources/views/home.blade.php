@extends('layouts.main')
<style>
    .title-word {
        animation: color-animation 1s linear infinite;
    }

    .title-word-1 {
        --color-1: #de7841;
        --color-2: #2abc97;
        --color-3: #e3b065;
    }

    .title-word-2 {
        --color-1: #52d3cc;
        --color-2: #c1cfac;
        --color-3: #186065;
    }

    .title-word-3 {
        --color-1: #8ed89f;
        --color-2: #d997cd;
        --color-3: #6ba19b;
    }

    .title-word-4 {
        --color-1: #4ea3c7;
        --color-2: #c67244;
        --color-3: #da8887;
    }

    @keyframes color-animation {
        0% {
            color: var(--color-1)
        }

        32% {
            color: var(--color-1)
        }

        33% {
            color: var(--color-2)
        }

        65% {
            color: var(--color-2)
        }

        66% {
            color: var(--color-3)
        }

        99% {
            color: var(--color-3)
        }

        100% {
            color: var(--color-1)
        }
    }

    /* Here are just some visual styles. 🖌 */


    .title {
        text-align: center;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 50px;
        text-transform: uppercase;
    }
</style>

@section('container')
        <h5 class="title mb-5 mt-5">
            <span class="title-word title-word-1">WELCOME</span>
            <span class="title-word title-word-2">TO</span>
            <span class="title-word title-word-3">ClassicModels!</span>
        </h5>
    <div class="text-center">
        <h5 class="mb-3">Dunia Kendaraan Klasik! Kami adalah sumber utama bagi para pecinta kendaraan klasik yang
            bersemangat. Di ClassicModels, kami memahami pesona yang melekat dalam setiap kendaraan klasik.</h5>
        <h5 class="mb-3">Kami mengundang Anda untuk menjelajahi koleksi kami yang penuh pesona. Setiap kendaraan klasik
            yang kami tawarkan adalah sebuah karya seni yang mewakili keanggunan, desain yang tak tertandingi, dan nilai historis yang tak
            ternilai. </h5>
        <h5 class="mb-3">Di ClassicModels, kami memahami bahwa kendaraan klasik adalah lebih dari sekadar alat
            transportasi; mereka adalah warisan budaya dan cinta yang abadi akan keindahan. Terima kasih telah bergabung dengan kami dalam perjalanan
            ini. Selamat menemukan pesona klasik di dunia kendaraan bersama kami!</h5>
    </div>
@endsection
