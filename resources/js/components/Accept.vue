<template>
  <div>
    <a v-if="canAccept" title="Mark as best answer" 
    :class="classes"
    @click.prevent="create"
    >
        <span class="favourite-count">&#10004</span>
    </a>

    <a v-if="isBest" title="This has been accepted as best answer" :class="classes">
        <span class="favourite-count">&#10004</span>8292
    </a>
  
  </div>
</template>

<script>
    export default {
        props: ['answer'],

        data(){
            return {
                isBest: this.answer.is_best,
                id: this.answer.id
            }
        },

        methods: {
            create(){
                axios.post(`/answers/${this.id}/accept`)
                .then(res => {
                    this.$toast.success(res.data.message, "Success", {
                        timeout: 3000,
                        position: 'bottomLeft'
                    });

                    this.isBest = true;
                })
            }
        },

        computed: {
            canAccept(){
                return true;
            },

            accepted(){
                return !this.canAccept && this.answer.is_best
            },

            classes(){
                return [
                    'mt-2',
                    this.accepted() ? 'vote-accepted' : ''
                ]
            }
        }
    }
</script>