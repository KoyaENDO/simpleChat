<template>
    <div class="message">
              <input
                      type="text"
                      :value="inputText"
                      @input="e => handleInput(e)"
                      placeholder="メッセージを入力"
              >
            <button type="button" @click="send">
                送信
            </button>
    </div>
</template>

<script>
    import store from "../store";

    export default {
        props: {
            userId: Number,
            inputText: String
        },
        methods: {
            handleInput(e) {
                store.setInputText(e.target.value);
            },
            send() {
                const text = this.inputText.trim().replace(/\n$/, "");
                if (text) {
                    store.clearInputText();
                    store.appendMessage({
                        userId: this.userId,
                        messages: [
                            {
                                type: "text",
                                body: text
                            }
                        ]
                    });
                    store.postMessage(text);
                }
            }
        }
    };
</script>
