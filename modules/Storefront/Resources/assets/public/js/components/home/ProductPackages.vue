<template>
    <section class="landscape-tab-products-wrap">
        <div class="container">
            <div class="tab-products-header">
                <div class="tab-products-header-overflow">
                    <ul class="tabs">
                        <li
                            v-for="(tab, index) in tabs"
                            :key="index"
                            :class="classes(tab)"
                            @click="change(tab)"
                        >
                            {{ tab.label }}
                        </li>
                    </ul>

                    <hr>
                </div>
            </div>

            <div class="tab-content">
                <div class="landscape-left-tab-products">
                    <ProductCard
                        v-for="product in products"
                        :key="product.id"
                        :product="product"
                    />
                </div>
            </div>

            <dynamic-tab
                v-for="(tabLabel, index) in data"
                :key="index"
                :label="tabLabel"
                :url="
                    route('storefront.tab_packages.index', {
                        sectionNumber: 1,
                        tabNumber: index + 1,
                    })
                "
            >
            </dynamic-tab>
        </div>
    </section>
</template>

<script>
import { slickPrevArrow, slickNextArrow } from "../../functions";
import ProductCard from "../ProductCard.vue";
import DynamicTabsMixin from "../../mixins/DynamicTabsMixin";

export default {
    components: { ProductCard },

    mixins: [DynamicTabsMixin],

    props: ["data"],

    methods: {
        selector() {
            return $(".landscape-left-tab-products");
        },

        slickOptions() {
            return {
                rows: 0,
                dots: false,
                arrows: true,
                infinite: true,
                slidesToShow: 6,
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
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 1301,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 1051,
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
                        breakpoint: 768,
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
            };
        },
    },
};
</script>
