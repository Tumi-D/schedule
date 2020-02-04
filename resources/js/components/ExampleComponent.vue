<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{ lorem }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mount");
    },
    data() {
        return {
            lorem:
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam incidunt maiores velit voluptatibus. Nam id vitae minima sint, laudantium, nesciunt commodi doloremque dolore officia libero provident possimus maiores, quibusdam natus!"
        };
    }
};
</script>
