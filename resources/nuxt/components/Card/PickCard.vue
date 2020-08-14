
<template>
    <div class="pickcard">
        <div class="pickcard__notify">
            <span class="pickcard__notify__comment">{{notifyComment}}</span>
            <span class="pickcard__notify__time">{{notifyTime}}</span>
        </div>
        <div class="pickcard__title">
            <span class="pickcard__title__name">{{pickcardTitle}}</span>
        </div>
        <div class="pickcard__content">
            <div class="pickcard_content_up">
                <div class="pickcard__content__up__thumbnail">
                    <img :src="image_path()" class="article_thumbnail">
                </div>
                <div>
                    <div class="pickcard__content__up__a">
                        <span class="pickcard__content__up__a__manname">
                            {{manName}}
                        </span>
                        <div class="button is-light pickcard__content__up__a__followerNum">
                            <span class="pickcard__content__up__a__followerNum__num">
                                {{followerNum}}
                            </span>
                            <div class="pickcard__content__up__a__followerNum__str">
                                フォロワー
                            </div>
                        </div>
                        <div class="button is-light pickcard__content__up__a__followerNum">
                            <span class="pickcard__content__up__a__followerNum__num">
                                {{pickNum}}
                            </span>
                            <div class="pickcard__content__up__a__followerNum__str">
                                picks
                            </div>
                        </div>
                        
                    </div>
                    <div class="pickcard__content__up__b">
                        {{shozoku}} 所属
                    </div>
                </div>
            </div>
            <div class="pickcard__under-element"></div>
            <div class="pickcard__content__comment">{{pickComment}}</div>
            <b-button type="is-danger" rounded outlined class="pickcard__content__like">
                <font-awesome-icon icon="heart" />
                {{likeNum}}
            </b-button>
            <div class="pickcard__under-element"></div>
        </div>

    </div>
</template>    

<script>
    export default{
        name: "pickCard",
        props: {
            notifyComment: String,
            notifyTime: String,
            pickcardTitle: String,
            pickcardDescription: String,
            manName: String,
            followerNum: String,
            pickNum: String,
            shozoku: String,
            pickComment: String,
            likeNum: String,
            pickcardPicksNumber: String,
            pickcardPvNumber: String
        },
        methods: {
            image_path: function(){
                return require ("../../assets/pickcard-thumbnail.png")
            }
        }
    }
</script>

<style scoped lang="sass">
    .pickcard
        margin: 10px 10px 10px 10px;
        &__under-element
            clear: both;
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
            border: solid 1px #707070;
            border-radius: 5px;
            padding: 10px 10px 10px 10px;
            &__up
                
                &__thumbnail
                    width: 11%;
                    float: left;    
                    margin-right: 8px;
                    .article_thumbnail
                        border-radius: 50%;
                        width: 100%;
                        height: 100%;
                        max-height: 200px;
                &__a
                    &__manname
                        font-family: Arial;
                        font-weight: bold;
                        font-size: 13px;
                        text-align: left;
                        color: #868686;
                    &__followerNum
                        height: 23px;
                        margin-top: 3px;
                        padding: 5px 5px 5px 5px;
                        pointer-events: none;

                        font-family: Arial;
                        font-size: 11px;
                        line-height: 24px;
                        text-align: left;
                        color: #363636;

                        &__num
                            
                            font-family: Arial;
                            font-weight: bold;
                            font-size: 14px;
                            
                            text-align: left;
                            color: #363636;
                            margin-right: 3px;
                        &__str
                            margin-top: 2px;
                &__b
                    font-family: Arial;
                    font-weight: normal;
                    font-size: 11px;
                    text-align: left;
                    color: #868686;
            &__comment
                width: 265px;
                height: 82px;
                border-radius: 4px;
                background: #feffe3;
                border: 0.5px solid #c7cf7f;
                padding: 5px 5px 5px 5px;
                overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;                
                float: left;
            &__like
                margin-top: 25px;
                margin-left: 5px;
 
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

