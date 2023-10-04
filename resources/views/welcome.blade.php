<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Welcome</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C800" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C800" />
    <link rel="stylesheet" href="./styles/iphone-14-plus-1.css" />
</head>

<body>
    @include('components.header')
    @include('components.css.start')

    <div class="iphone-14-plus-1-VCb">
        <div class="auto-group-ntgs-tkX">
            <div class="auto-group-db6f-foD">
                <div class="textos-ncw">
                    <p class="aberta-a-votao-para-melhor-cosplay-e-melhor-hq-da-snct-2023-JrB">Aberta a votação para
                        melhor Cosplay e melhor HQ da SNCT 2023</p>
                    <p
                        class="confira-agora-as-produes-dos-alunos-das-turmas-dos-segundos-anos-de-informtica-e-de-todos-os-primeiros-anos-clicando-logo-abaixo-84X">
                        Confira agora as produções dos alunos das turmas dos Segundos Anos de Informática e de todos os
                        Primeiros anos clicando logo abaixo
                        <br />

                    </p>
                </div>
                <img class="logo-ifro-cacoal-1-8ij" src="https://snct-ifro-2023.s3.sa-east-1.amazonaws.com/system/logo-ifro-cacoal-1-DGb.png" />
            </div>
            <div class="botoes-redirect-EFy">
                <a class="frame-4-WjH" href="{{ route('hqs.index') }}">Quadrinhos</a>
                <a class="frame-5-Wsh" href="{{ route('cosplays.index') }}">Cosplays</a>
            </div>
        </div>
        <div class="frame-7-aMm">
            <a class="frame-6-WWK" href="{{ route('cosplays.index') }}">Cosplays</a>
            <a class="frame-7-6UX" href="{{ route('cosplays.index') }}">Cosplays</a>
            <div class="images-j1h">
                <img class="monalisa-96e92206-2-pYw" src="https://snct-ifro-2023.s3.sa-east-1.amazonaws.com/system/monalisa-96e92206-2.png" />
            </div>
            <p
                class="lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry-lorem-ipsum-has-been-the-industrys-standard-dummy-text-ever-since-the-1500s-when-an-unknown-printer-took-a-galley-of-type-and-scrambled-it-to-make-la-ele-a-type-specimen-book-it-has-survived-not-only-five-centuries-but-also-the-leap-into-electronic-typesetting-remaining-essentially-unchanged-it-was-popularised-in-the-1960s-with-the-release-of-letraset-sheets-containing-lorem-ipsum-passages-and-more-recently-with-desktop-kSb">
                Os cosplays são uma ideia de origem da professora jakeline, doscente da disciplina de fundamento de análise de sistemas
                , com o propósito de unir a arte e a informática, esse site foi criado, nele nós mostramos os cosplays que tentam recriar
                 obras de arte do periodo renascentista, confira e avalie os cosplays feitos pelos alunos do IFRO campus Cacoal:)</p>
        </div>
        <div class="auto-group-yrxy-CC7">
            <img class="hq-spider-man-1-uMR" src="https://snct-ifro-2023.s3.sa-east-1.amazonaws.com/system/hq-spider-man-1.png" />
            <div class="auto-group-7ph1-Eeb">
                <p
                    class="lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry-lorem-ipsum-has-been-the-industrys-standard-dummy-text-ever-since-the-1500s-when-an-unknown-printer-took-a-galley-of-type-and-scrambled-it-to-make-la-ele-a-type-specimen-book-it-has-survived-not-only-five-centuries-but-also-the-leap-into-electronic-typesetting-remaining-essentially-unchanged-it-was-popularised-in-the-1960s-with-the-release-of-letraset-sheets-containing-lorem-ipsum-passages-and-more-recently-with-desktop-aTZ">
                    Assim como unimos a arte e a informática para exibir os cosplays, também decidimos mostrar as histórias em Quadrinhos feitas
                    pelos alunos do primeiro ano, essas remetendo a disciplina de lingua inglesa </p>
                <a class="frame-6-JXy" href="{{ route('hqs.index') }}">Quadrinhos</a>
            </div>
        </div>
        @include('components.footer')
    </div>
</body>
