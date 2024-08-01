<template>

	<div class="w-fit mx-auto mb-20 relative">
		<div class="w-12 h-12 absolute -top-0 -right-[80%] bg-titleLeft bg-cover bg-center"></div>
		<div class="font-bold text-4xl relative z-10 flex justify-center items-center gap-2">
			<div
				class="text-black absolute -top-2.5 left-1/2 transform -translate-x-1/2 opacity-5 text-nowrap text-6xl"
				v-text="title"
			/>
			<span
				v-text="title.split(' ')[0]"
				class="text-webPrimary text-shadow shadow-black z-10"
			/>
			<span v-text="title.split(' ')[1]" />
		</div>
		<div class="w-12 h-12 absolute -top-0 -left-[80%] bg-titleRight bg-cover bg-center"></div>
	</div>

</template>

<script setup>

	const props = defineProps({
		title: String,
	});

</script>