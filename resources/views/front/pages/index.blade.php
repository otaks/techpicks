@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                <img class="card-img-top" src="https://i.gzn.jp/img/2018/11/29/killing-mosquitoes/00_m.jpg" height="300px"  alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Googleの親会社は世界中の蚊を撲滅するための技術を開発中</h2>
                    <p class="card-text">Googleの親会社であるAlphabetの研究者たちが、蚊を媒介とする病気を根絶するため、蚊の卵が孵化しなくなる技術を開発しています。</p>
                     <p class="card-text border border-secondary"><img class="rounded-circle" src="{{ asset('storage/sekainoaoki.jpg') }}" alt="Generic placeholder image" width="100" height="100">へのへのもへじ</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">総Pick数 xxx</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Pick</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-12 shadow-sm">
                <img class="card-img-top" src="https://techable.jp/wp-content/uploads/2018/11/EARTHAR.jpg" height="300px" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">大人も欲しい！地球儀にスマホをかざして地球をARで学べる！職人手描きの「Earth AR」は美しさも魅力</h2>
                    <p class="card-text">子どものころ、地球儀を眺めて楽しんだ記憶はないだろうか。世界にはいろんな国や土地があり、多様な生物や地形が存在するんだと思いを巡らしたはず。そんな地球儀と、現代のテクノロジーAR（拡張現実）が組み合...</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">総Pick数 xxx</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Pick</button>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div>
</div>
@endsection
