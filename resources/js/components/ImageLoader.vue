<template>
    <div class="image-loader" @click="$refs.image.click()">
        <input type="file" :name="name" class="d-none" ref="image" @change="uploadImage">
        <img :src="image || initialImage" alt="Clique para adicionar uma imagem">
    </div>
</template>

<script>
    export default {
        name: 'ImageLoader',
        props: ['value', 'initialImage', 'name'],
        data() {
            return {
                image: null,
            }
        },
        methods: {
            uploadImage(e) {
                const file = e.target.files[0];
                const reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = (event) => {
                    this.image = event.target.result;
                };

                this.$emit('input', file);
            }
        },
    }
</script>

<style scoped lang="scss">
    .image-loader {
        width: 200px;
        height: 150px;
        background-color: white;
        border: 1px solid #b4b4b4;
        border-radius: 5px;
        cursor: pointer;
        img {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
    }
</style>
