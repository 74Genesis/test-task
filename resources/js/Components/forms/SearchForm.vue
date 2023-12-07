<script lang="ts" setup>
import { reactive, ref } from "vue";
import type { FormProps } from "element-plus";
import WhiteBlock from "../base/WhiteBlock.vue";

const fields = reactive({
    name: "",
    bedrooms: null,
    bathrooms: null,
    storeys: null,
    garages: null,
    priceFrom: null,
    priceTo: null,
});
</script>

<template>
    <WhiteBlock>
        <el-form
            label-position="top"
            label-width="100px"
            :model="fields"
            size="large"
        >
            <div class="flex gap-6">
                <el-form-item label="Name">
                    <el-input v-model="fields.name" clearable />
                </el-form-item>
                <el-form-item label="Bedrooms">
                    <el-input-number
                        v-model="fields.bedrooms"
                        :min="1"
                        :max="10"
                        controls-position="right"
                    />
                </el-form-item>
                <el-form-item label="Bathrooms">
                    <el-input-number
                        v-model="fields.bathrooms"
                        :min="1"
                        :max="10"
                        controls-position="right"
                    />
                </el-form-item>
                <el-form-item label="Storeys">
                    <el-input-number
                        v-model="fields.storeys"
                        :min="1"
                        :max="10"
                        controls-position="right"
                    />
                </el-form-item>
                <el-form-item label="Garages">
                    <el-input-number
                        v-model="fields.garages"
                        :min="1"
                        :max="10"
                        controls-position="right"
                    />
                </el-form-item>
            </div>
            <div class="flex gap-6 justify-center">
                <el-form-item
                    label="Price From"
                    :rules="[
                        { type: 'number', message: 'price must be a number' },
                    ]"
                    prop="priceFrom"
                >
                    <el-input
                        v-model.number="fields.priceFrom"
                        clearable
                        type="text"
                        autocomplete="off"
                        :parser="(value) => value.replace(/\$\s?|(,*)/g, '')"
                        :formatter="
                            (value) =>
                                `$ ${value}`.replace(
                                    /\B(?=(\d{3})+(?!\d))/g,
                                    ','
                                )
                        "
                    />
                </el-form-item>
                <el-form-item
                    label="Price To"
                    prop="priceTo"
                    :rules="[
                        { type: 'number', message: 'price must be a number' },
                    ]"
                >
                    <el-input
                        v-model.number="fields.priceTo"
                        clearable
                        type="text"
                        autocomplete="off"
                        :parser="(value) => value.replace(/\$\s?|(,*)/g, '')"
                        :formatter="
                            (value) =>
                                `$ ${value}`.replace(
                                    /\B(?=(\d{3})+(?!\d))/g,
                                    ','
                                )
                        "
                    />
                </el-form-item>
            </div>
        </el-form>
    </WhiteBlock>
</template>

<style>
.el-input-number {
    width: 130px;
}
</style>
