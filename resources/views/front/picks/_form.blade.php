<form>
    <h3 class="mb-5">キジヲピピック</h3>
    <div class="form-group">
        <label for="url">URL</label>
        <input type="url" class="form-control" id="url" placeholder="http://newspicks.com">
    </div>
    <div class="card card-post mt-5 mb-5">
        <div class="card-img-block">
            <img class="img-fluid" src="https://images.pexels.com/photos/870903/pexels-photo-870903.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Card image cap">
        </div>
        <div class="card-body">
            {{-- <img src="https://randomuser.me/api/portraits/men/64.jpg" alt="profile-image" class="profile"/> --}}
            <h5 class="card-title">
                URLが入力されたらAJAXで取得したtitleを動的表示
            </h5>
            <div class="card-text mb-3">
                ここもdescriptionを動的表示。ogpの画像も取得して上に表示？keywordsも同時に取得して、hiddenでパラメータに持たせてpostさせればいいかも。
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="comment">コメント</label>
        <textarea class="form-control" id="comment" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-block btn-primary mt-5">ピック！</button>
</form>