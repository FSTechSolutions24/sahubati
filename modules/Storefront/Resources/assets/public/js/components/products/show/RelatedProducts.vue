<template>
    <section class="landscape-products-wrap" v-if="hasAnyProduct">
        <div class="products-header">
            <h5 class="section-title">
                {{ $trans("storefront::product.related_products") }}
            </h5>
        </div>

        <div class="landscape-products" ref="productsPlaceholder">
            <ProductCard
                v-for="(product, index) in products"
                :key="index"
                :product="product"
            ></ProductCard>
        </div>
    </section>
</template>

<script>
import { slickPrevArrow, slickNextArrow } from "../../../functions";
import ProductCard from "./../../ProductCard.vue";

export default {
    components: { ProductCard },

    props: ["products"],

    computed: {
        hasAnyProduct() {
            return this.products.length !== 0;
        },
    },

    mounted() {
        $(this.$refs.productsPlaceholder).slick({
            rows: 0,
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            rtl: window.FleetCart.rtl,
            prevArrow: slickPrevArrow(),
            nextArrow: slickNextArrow(),
            autoplay: true,     
            autoplaySpeed: 1500,
            speed: 500,
            infinite: true,
             
            responsive: [
                {
                    breakpoint: 1761,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 1341,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 881,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 661,
                    settings: {
                        dots: true,
                        arrows: false,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 641,
                    settings: {
                        dots: true,
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    },
};
</script>
