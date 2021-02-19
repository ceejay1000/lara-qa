<template>
  <a
    title="Click to mark as favourite question (Click again to undo)"
    :class="classes"
    @click.prevent="toggle"
  >
    <span class="favourite-count">&#127775;</span>
    <span>{{ count }}</span>
  </a>
</template>

<script>
export default {
  props: ["question"],

  data() {
    return {
      isFavorited: this.question.is_favorited,
      count: this.question.favorites_count,
      id: this.question.id,
    };
  },

  computed: {
    classes() {
      return [
        "favorite",
        "mt-2",
        !this.signedIn ? "off" : this.isFavorited ? "favorited" : "",
      ];
    },
    endPoint() {
      return `/questions/${this.id}/favourites`;
    },
    signedIn() {
      return window.Auth.signedIn;
    },
  },

  methods: {
    toggle() {
      if (!this.signedIn) {
        this.$toast.warning(
          "Please login to favorite this question",
          "warning",
          {
            timeout: 3000,
            position: "bottomLeft",
          }
        );
      }
      this.isFavourited ? this.destroy() : this.create();
    },

    destroy() {
      axios.delete(this.endPoint).then((res) => {
        this.count--;
        this.isFavorited = false;
      });
    },
    created() {
      axios.delete(this.endPoint).then((res) => {
        this.count--;
        this.isFavorited = true;
      });
    },
  },
};
</script>