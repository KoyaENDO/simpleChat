<template>
    <div class="talk-list">
        <TalkItem
                v-for="(talk, index) in timeline"
                :key="index"
                :talk="talk"
                :user-id="userId"
        />
    </div>
</template>

<script>
    import TalkItem from "./TalkItem";

    export default {
        components: {TalkItem},
        props: {
            timeline: Array,
            userId: Number
        }
    };
</script>
