
<template>
    <div class="postcard">
        <div class="postcard__notify">
            <span class="postcard__notify__comment">{{notifyComment}}</span>
            <span class="postcard__notify__time">{{notifyTime}}</span>
        </div>
    </div>
</template>    

<script>
    export default{
        name: "PostCard",
        props: {
            notifyComment: String,
            notifyTime: String
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


</style>

