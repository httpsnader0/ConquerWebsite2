<template>

	<section class="w-full mb-20">

		<Title :title="$t('Last News')" />

		<div class="grid grid-cols-3 gap-10">

			<div class="flex gap-10 col-span-2">

				<iframe
					src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fparty.conquer0&tabs=timeline&width=900&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
					width="900"
					height="500"
					scrolling="no"
					frameborder="0"
					allowfullscreen="true"
					allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
				/>

				<iframe
					src="https://discordapp.com/widget?id=1269359936136286309"
					height="500"
					allowtransparency="true"
					frameborder="0"
					sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"
					class="w-full"
				/>

			</div>

			<div class="panel-content">

				<template
					v-for="(blog, index) in blogs"
					:key="index"
				>

					<Link
						:href="blog.route"
						class="bg-gray-50 hover:bg-gray-100 hover:scale-105 hover-animate p-2 rounded-2xl shadow border border-border-light dark:border-border-dark flex justify-start items-center gap-5"
					>

					<span
						class="bg-gray-400 uppercase py-3 px-10 rounded-2xl flex justify-center items-center"
						v-text="blog.createdAt"
					/>

					{{ blog.name }}

					</Link>

				</template>

			</div>

		</div>

	</section>

</template>

<script setup>

	import Title from '@/Layouts/Website/Components/Title.vue';

	const props = defineProps({
		blogs: Number,
	});

</script>