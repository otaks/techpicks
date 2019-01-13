
<template>
    <div>
        <button type="button" class="btn-warning" v-on:click="_delete">Pick削除</button>
    </div>
</template>

<script>
export default {
    props:["pickId", "postId"],
    data:function(){
        return{
            isProcessing:false,
        }
    },    
    methods:{
        _delete: function() {
            if(!window.confirm('本当に削除しますか？')){
                return
            }
            this.isProcessing = true
            axios.get("/picks/delete/" + this.pickId + "/" + this.postId)
            .then(() => {
                this.isProcessing=false
            })
        }
    }
}
</script>
