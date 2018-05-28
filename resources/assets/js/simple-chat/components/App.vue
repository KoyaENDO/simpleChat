<template>
    <v-ons-page>
        <v-ons-toolbar>
            <div class="center">SimpleChat</div>
        </v-ons-toolbar>

        <v-ons-tabbar
                swipeable
                tab-border
                position="top"
                :tabs="tabs"
                :on-swipe="onSwipe"
        />
    </v-ons-page>
</template>
<script>
    import Main from "./Main";
    import Chat from "./Chat";

    const red = [244, 67, 54];
    const blue = [30, 136, 229];
    const lerp = (x0, x1, t) => parseInt((1 - t) * x0 + t * x1, 10);

    export default {
        components: {Main, Chat},
        data() {
            return {
                // tab-bar
                colors: red,
                animationOptions: {},
                tabs: [
                    {
                        page: Main,
                        label: 'Home',
                        theme: red
                    },
                    {
                        page: Chat,
                        label: 'Chat',
                        theme: blue
                    }
                ]
            };
        },
        methods: {
            onSwipe(index, animationOptions) {
                this.animationOptions = animationOptions;
                const a = Math.floor(index), b = Math.ceil(index), ratio = index % 1;
                this.colors = this.colors.map((c, i) => lerp(this.tabs[a].theme[i], this.tabs[b].theme[i], ratio));
            }
        }
    };
</script>


}
        }
    };
</script>