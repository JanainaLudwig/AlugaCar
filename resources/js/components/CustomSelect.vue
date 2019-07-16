<template>
    <div class="select">
        <input type="text" class="input-hidden" :name="name" :value="selectedValue" :required="{'required' : required}">
        <div tabindex="0" :style="{width: width}" class="select-input pointer" :class="{'opened' : open}" @click="open = !open" @keydown.enter="open = !open">{{selectText}}</div>
        <transition name="slide">
            <div v-if="open" class="select-options shadow-sm" v-click-outside="hide">
                <div class="select-search" v-if="search">
                    <input type="text" class="form-control" v-model="searchText">
                </div>
                <slot>
                    <div class="select-option" :class="{'selected' : isSelected(index)}" v-for="(item, index) in filteredItems" @click="select(index)">
                        {{item[itemText] || item}}
                    </div>
                    <div v-if="filteredItems.length === 0" class="text-center text-muted py-2">
                        <span>Não há items.</span>
                    </div>
                </slot>
            </div>
        </transition>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside';

    export default {
        name: 'custom-select',
        props: ['placeholder', 'items', 'name', 'item-text', 'item-value', 'required', 'search', 'width'],
        data() {
            return {
                open: false,
                selected: null,
                selectedValue: null,
                searchText: '',
            }
        },
        methods: {
            hide() {
                this.open = false;
            },
            select(index) {
                this.selectedValue = this.filteredItems[index][this.itemValue] || this.filteredItems[index];

                this.selected = this.filteredItems[index];
                this.$emit('change', this.filteredItems[index]);

                this.hide();
            },
            isSelected(index) {
                return this.selectText === (this.filteredItems[index][this.itemText] || this.filteredItems[index])
            }
        },
        computed: {
            selectText() {
                if (!this.selected) {
                    return this.placeholder;
                }

                return this.selected[this.itemText] || this.selected;
            },
            filteredItems()
            {
                return this.items.filter(item => {
                    let itemText = (item[this.itemText] || item).toLowerCase();

                    return itemText.includes(this.searchText.toLowerCase());
                });
            }
        },
        mounted () {
            this.popupItem = this.$el
        },
        directives: {
            ClickOutside
        }
    }
</script>

<style scoped lang="scss">
    .select {
        position: relative;
        &.white .select-input {
            color: white;
            border-color: white;
        }
    }

    .select-input {
        position: relative;
        border: 1px solid #1EAAC1;
        background-color: white;
        border-radius: 200px;
        color: #1e1e1e;
        padding: 3px 8px;
        cursor: pointer;
        outline: none;
        &:after {
            content: '˅';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        &.opened, &:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25)
        }
        &.opened:after {
            transform: rotate(180deg) translateY(50%);
        }
    }

    .select-options {
        position: absolute;
        width: 100%;
        background-color: white;
        border: 1px solid #BFBFBF;
        border-radius: 3px;
        color: #2f2f2f;
        transition: transform .3s ease-in-out;
        transform-origin: top;
        overflow-y: auto;
        max-height: 250px;
        z-index: 500000;
        .select-option {
            padding: 8px;
            cursor: pointer;
            &:hover {
                background-color: darken(white, 5);
            }
            &.selected {
                background-color: darken(white, 15);
            }
        }
        .select-option:not(:last-of-type) {
            border-bottom: 1px solid #BFBFBF;
        }
    }

    .slide-enter, .slide-leave-to{
        transform: scaleY(0);
    }

    .input-hidden {
        visibility: hidden;
        width: 0;
        height: 0;
        position: absolute;
    }

    .select-search {
        padding: 10px;
        text-align: center;
        position: relative;
        &:after {
            content: 'O';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 25px;
            color: #BFBFBF;
        }
        input {
            border-radius: 100px;
            width: 100%;
            padding-right: 30px;
        }
    }
</style>
