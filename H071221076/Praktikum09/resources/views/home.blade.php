@extends('layouts.main')
<style>
    .main {
        height: 75vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    h1 {
        text-align: center;
        text-transform: uppercase;
        color: #F1FAEE;
        font-size: 4rem;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .roller {
        height: 4.125rem;
        line-height: 4rem;
        position: relative;
        overflow: hidden;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

        color: #1D3557;
    }


    #spare-time {
        font-size: 1rem;
        font-style: italic;
        letter-spacing: 1rem;
        margin-top: 0;
        color: #A8DADC;

    }

    .roller #rolltext {
        position: absolute;
        top: 0;
        animation: slide 5s infinite;
    }

    @keyframes slide {
        0% {
            top: 0;
        }

        25% {
            top: -4rem;
        }

        50% {
            top: -8rem;
        }

        72.5% {
            top: -12.25rem;
        }
    }

    @media screen and (max-width: 600px) {
        h1 {
            text-align: center;
            text-transform: uppercase;
            color: #F1FAEE;
            font-size: 2.125rem;
        }

        .roller {
            height: 2.6rem;
            line-height: 2.125rem;
        }

        #spare-time {
            font-size: 1rem;
            letter-spacing: 0.1rem;
        }

        .roller #rolltext {
            animation: slide-mob 5s infinite;
        }

        @keyframes slide-mob {
            0% {
                top: 0;
            }

            25% {
                top: -2.125rem;
            }

            50% {
                top: -4.25rem;
            }

            72.5% {
                top: -6.375rem;
            }
        }
    }

    .bg {
    position: absolute;
    top: 50%;
    left: 50%;
    width:100%;
    height:100%;
    transform: translateX(-50%) translateY(-50%);

}
</style>

@section('container')
<img src="img/bg-flowersss.jpg" alt="" class="bg">
    <div class="main">
        <h1 class="main">Welcome To<div class="roller">
                <span id="rolltext">Flowersss<br />
                    For Make you Happy<br />
                </span>
            </div>
        </h1>

    </div>
@endsection
