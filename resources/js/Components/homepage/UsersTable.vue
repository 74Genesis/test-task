<script lang="ts" setup>
import { reactive, ref } from "vue";
import WhiteBlock from "../base/WhiteBlock.vue";

interface User {
    name: string;
    price: string;
    bedrooms: string;
    bathrooms: string;
    storeys: string;
    garages: string;
}

const formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
});

const tableData: User[] = [
    {
        name: "User name",
        price: "823423",
        bedrooms: "1",
        bathrooms: "3",
        storeys: "5",
        garages: "4",
    },
    {
        name: "User name",
        price: "823423",
        bedrooms: "1",
        bathrooms: "3",
        storeys: "5",
        garages: "4",
    },
    {
        name: "User name",
        price: "823423",
        bedrooms: "1",
        bathrooms: "3",
        storeys: "5",
        garages: "4",
    },
    {
        name: "User name",
        price: "823423",
        bedrooms: "1",
        bathrooms: "3",
        storeys: "5",
        garages: "4",
    },
];

const isEmpty = ref(() => true);
</script>

<template>
    <WhiteBlock v-loading="false">
        <div class="flex justify-center w-full" v-if="isEmpty">
            <el-empty description="No entries found 😭" />
        </div>
        <el-table :data="tableData" style="width: 100%" v-else>
            <el-table-column label="Name" prop="name"></el-table-column>
            <el-table-column label="Price" prop="price">
                <template #default="scope">
                    {{ formatter.format(scope.row.price) }}
                </template>
            </el-table-column>
            <el-table-column label="Bedrooms" prop="bedrooms"></el-table-column>
            <el-table-column
                label="Bathrooms"
                prop="bathrooms"
            ></el-table-column>
            <el-table-column label="Storeys" prop="storeys"></el-table-column>
            <el-table-column label="Garages" prop="garages"></el-table-column>
        </el-table>
    </WhiteBlock>
</template>

<style></style>
