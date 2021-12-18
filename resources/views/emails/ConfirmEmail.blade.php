<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="app font-sans min-w-screen min-h-screen bg-grey-lighter py-8 px-4 w-50">
            <div class="mail__wrapper max-w-md mx-auto">
                <div class="mail__content bg-white p-8 shadow-md">
                    <div class="content__body py-8 border-b">
                        <h3 class="text-center text-2xl sm:text-3xl pt-4 mb-8 "> Բարի գալուս NUACA հարգելի {{$details['name']}} {{$details['surname']}} </h3>
                        <h3 class="text-center text-2xl sm:text-3xl pt-4 mb-8 ">Ձեր էլ․ հասցեն հաստատելու համար սեղմեք ներքևի կոճակին </h3>
                        <button class="text-white text-sm tracking-wide bg-red rounded w-full my-8 p-4 ">
                            <a href="{{ url("confirm/".$details['id'].'/'.$details['url']) }}">ՀԱՍՏԱՏԵԼ</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>