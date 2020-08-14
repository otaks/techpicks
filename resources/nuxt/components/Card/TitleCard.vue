
<template>
    <div class="titlecard">
        <div class="titlecard__footerWrapper__footer__accessAnalysis">
            <div class="button is-outlined is-info titlecard__footerWrapper__footer__accessAnalysis__sumtitles">
                <span class="titlesNumber">{{titlecardtitlesNumber}}</span>
                picks
            </div>
            <div class="button is-outlined titlecard__footerWrapper__footer__accessAnalysis__sumPv">
                <span class="pvNumber">{{titlecardPvNumber}}</span>PV
            </div>
        </div>
        <div class="titlecard__thumbnail">
            <img :src="image_path()" class="article_thumbnail">
        </div>

        <div class="titlecard__title">
            <span class="titlecard__title__name">{{titlecardTitle}}</span>
        </div>
        <div class="titlecard__content">
            <span class="titlecard__content__description">{{titlecardDescription}}</span>
        </div>
        <div classs="titlecard__next">
            <div class="button is-info is-outlined titlecard__next__core">続きを読む</div>
        </div>
        <div class="button is-info is-outlined">
            あ
            <div class="button is-info is-outlined">
                いいいい
            </div>
        </div>
    </div>
</template>    

<script>
    export default{
        name: "titleCard",
        props: {
            notifyComment: String,
            notifyTime: String,
            titlecardTitle: String,
            titlecardDescription: String,
            manName: String,
            followerNum: String,
            titleNum: String,
            shozoku: String,
            titleComment: String,
            likeNum: String,
            titlecardtitlesNumber: String,
            titlecardPvNumber: String
        },
        methods: {
            image_path: function(){
                return require ("../../assets/postcard-thumbnail.png")
            }
        }
    }
</script>

<style scoped lang="sass">
    .titlecard
        margin: 10px 10px 10px 10px;
        
        &__thumbnail
            width: 100%; 
            margin-right: 8px;
            margin-top: 8px;
            .article_thumbnail
                border-radius: 2%;
                width: 100%;
                height: 100%;
                max-height: 200px;

        &__under-element
            clear: both;
        &__notify
            color: #868686;
            font-size: 13px;
            display: flex;
            justify-content: space-between;
        &__title
            margin-top: 0px;
            &__name
                @include title
                

        &__content
            padding: 3px 0px 3px 0px;

            &__description
                @include description            

        &__next
            width: 100%;
            &__core
                width: 110px;
                display: block;
                margin: 0 auto;
                

        &__footerWrapper
            &__footer
                display: flex;
                margin-top: 10px;
                &__accessAnalysis
                    display: flex;
                    width: 75%;
                    pointer-events: none;
                    &__sumtitles
                        height: 23px;
                        padding: 5px;
                        opacity: 1;

                        .titlesNumber
                            font-weight: bold;
                            padding-right: 5px;
                    &__sumPv
                        height: 23px;
                        opacity: 1;
                        margin-left: 10px;   
                        .pvNumber
                            font-weight: bold;
                            padding-right: 3px;

</style>

