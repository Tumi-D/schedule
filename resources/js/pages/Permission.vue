<template>
    <div>
        <h1>Permission</h1>
        <p>{{ lorem }}</p>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Permission mounted.");
    },
    data: () => ({
        lorem:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam incidunt maiores velit voluptatibus. Nam id vitae minima sint, laudantium, nesciunt commodi doloremque dolore officia libero provident possimus maiores, quibusdam natus!"
    })
};
</script>

<style></style>
