
<template>
    <div class="postcard">
        <div class="postcard__notify">
            <span class="postcard__notify__comment">{{notifyComment}}</span>
            <span class="postcard__notify__time">{{notifyTime}}</span>
        </div>
        <div class="postcard__title">
            <span class="postcard__title__name">{{postcardTitle}}</span>
        </div>
        <div class="postcard__content">
            <span class="postcard__content__description">{{postcardDescription}}</span>
            <div class="postcard__content__thumbnail">
                <img :src="image_path()" class="article_thumbnail">
            </div>
        </div>
        <div class="postcard__footerWrapper">
            <div class="postcard__footerWrapper__footer">
                <div class="postcard__footerWrapper__footer__accessAnalysis">
                    <div class="button is-outlined postcard__footerWrapper__footer__accessAnalysis__sumPicks">
                        <span class="picksNumber">{{postcardPicksNumber}}</span>Picks
                    </div>
                    <div class="button is-outlined postcard__footerWrapper__footer__accessAnalysis__sumPv">
                        <span class="pvNumber">{{postcardPvNumber}}</span>PV
                    </div>
                </div>
                <b-button rounded type="button" class="postcard__footerWrapper__footer__pickButton">
                    <span class="pickIcon"><font-awesome-icon icon="pen" /></span>Pick
                </b-button>
            </div>
        </div>
    </div>
</template>    

<script>
    export default{
        name: "PostCard",
        props: {
            notifyComment: String,
            notifyTime: String,
            postcardTitle: String,
            postcardDescription: String,
            postcardPicksNumber: String,
            postcardPvNumber: String
        },
        methods: {
            image_path: function(){
                return require ("../../assets/postcard-thumbnail.png")
            }
        }
    }
</script>

<style scoped lang="sass">
    .postcard
        margin: 10px 10px 10px 10px;
        &__notify
            color: #868686;
            font-size: 13px;
            display: flex;
            justify-content: space-between;
        &__title
            margin-top: 5px;
            &__name
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;
                overflow: hidden;
                font-size: 20px;
                font-weight: bold;
                
        &__content
            display: flex;
            margin-top: 7px;
            &__description
                @include description
                width: 75%;
            &__thumbnail
                width: 25%;
                .article_thumbnail
                    width: 100%;
                    height: 100%;
                    max-height: 200px;
        &__footerWrapper
            &__footer
                display: flex;
                margin-top: 10px;
                &__accessAnalysis
                    display: flex;
                    width: 75%;
                    pointer-events: none;
                    &__sumPicks
                        height: 23px;
                        padding: 5px;
                        opacity: 1;
                        color: #FF3860;
                        border-color: #FF3860;
                        .picksNumber
                            font-weight: bold;
                            padding-right: 5px;
                    &__sumPv
                        height: 23px;
                        opacity: 1;
                        margin-left: 10px;   
                        .pvNumber
                            font-weight: bold;
                            padding-right: 3px;
                &__pickButton
                    height: 36px;
                    width: 25%;
                    font-size: 16px;
                    background-color: #3273DC;
                    color: white;
                    padding-left: 10px;
                    margin-left: auto;
                    .pickIcon
                        margin-right: 8px;


</style>

