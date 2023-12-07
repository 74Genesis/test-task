<script lang="ts" setup>
import { reactive, ref, computed } from "vue";
import WhiteBlock from "../base/WhiteBlock.vue";
import useUsersTable from "../../composables/usersTable";

const { users, loading, errorMessage } = useUsersTable();

const formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
});

const isEmpty = computed(() => !users.value?.length);
</script>

<template>
    <WhiteBlock v-loading="loading">
        <div v-if="errorMessage">
            {{ errorMessage }}
        </div>
        <div class="flex justify-center w-full" v-else-if="isEmpty">
            <el-empty description="No entries found 😭" />
        </div>
        <el-table :data="users" style="width: 100%" v-else>
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
