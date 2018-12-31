
<div class="container-fluid">
    <div classs="row">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}">
                <button type="button" class="btn btn-sm btn-outline-secondary">HOME</button>
            </a>
            <a href="{{ url('/mypage') }}">
                <button type="button" class="btn btn-sm btn-outline-secondary">マイピック</button>
            </a>
            <a href="{{ url('/posts/create') }}">
                <button type="button" class="btn btn-sm btn-outline-secondary">記事登録</button>
            </a>
        </div>
    </div>
</div>
