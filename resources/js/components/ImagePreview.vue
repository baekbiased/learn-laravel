<template>
    <div>
        <input type="file" name="image" @change="ImagePreview" />
        <div id="preview">
            <img v-if="previewImage" :src="previewImage" />
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                previewImage: null,
            }
        },
        methods: {
            ImagePreview(e) {
                this.upload_img_url = e.target.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(this.upload_img_url);
                reader.onload = e => {
                    this.previewImage = e.target.result;
                };
            },
        }
    }
</script>

<style>
    body {
        background-color: #e2e2e2;
    }

    #app {
        padding: 20px;
    }

    #preview {
        display: flex;
        justify-content: left;
        align-items: left;
        padding: 5px;
    }

    #preview img {
        max-width: 25%;
        max-height: 500px;
    }
</style>
