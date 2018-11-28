window.app = {
  win: $(window),
  doc: $(document),
  body: $('body'),
  token: $('meta[name="csrf-token"]').attr('content'),
  something: function() {
    console.log('Fire!')
    //全ページで呼べる共通関数をここに定義すればいいかも？（Ex: app.loading.show())
  }
}
