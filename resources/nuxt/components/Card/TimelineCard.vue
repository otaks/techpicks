<template>
    <div class="timelineCard">
        <div class="timelineCard__notify">
            <span class="timelineCard__notify__comment">{{notifyComment}}</span>
            <span class="timelineCard__notify__time">{{notifyTime}}</span>
        </div>
        <div class="timelineCard__title">
            <span class="timelineCard__title__name">{{timelineCardTitle}}</span>
        </div>
        <div class="box">
            <div class="box__content">
                <div class="box__content__userInfo">
                    <figure class="image is-48x48">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/48x48.png">
                    </figure>
                    <div class="box__content__userInfo__profile">
                        <div class="box__content__userInfo__profile__userName">{{userName}}</div>
                        <div class="box__content__userInfo__profile__organization">{{organization}}</div>
                    </div>
                    <b-button disabled class="box__content__userInfo__follower">
                        <span class="followerNumber">{{timelineCardFollowerNumber}}</span>フォロワー
                    </b-button>
                    <b-button disabled class="box__content__userInfo__picks">
                        <span class="picksNumber">{{timelineCardPicksNumber}}</span>picks
                    </b-button>
                </div>
                <div class="box__content__pickComment">{{timelienCardPickComment}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: "TimelineCard",
        props: {
            notifyComment: String,
            notifyTime: String,
            timelineCardTitle: String,
            userName: String,
            organization: String,
            timelineCardFollowerNumber: String,
            timelineCardPicksNumber: String,
            timelienCardPickComment: String
        },
        
    }
</script>

<style scoped lang="sass">
    .timelineCard
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
        .box
            &__content
                margin-top: -10px;
                &__userInfo
                    display: flex;
                    &__profile
                        font-family: arial;
                        margin-top: 10px;
                        margin-left: 10px;
                        &__userName
                            font-size: 13px;
                            font-weight: bold;
                        &__organization
                            font-size: 11px;
                    &__follower
                        font-size: 10px;
                        margin-top: 10px;
                        margin-left: 7px;
                        opacity: 1;
                        .followerNumber
                            font-weight: bold;
                            padding-right: 2px;
                    &__picks
                        font-size: 10px;
                        margin-top: 10px;
                        margin-left: 5px;
                        opacity: 1;
                        .picksNumber
                            font-weight: bold;
                            padding-right: 2px;
                &__pickComment 
                    border: solid 1px #C7CF7F;
                    border-radius: 5px;
                    background-color: #FEFFE3;
                    margin-top: 10px;
                    width: 70%;

</style>