<template>

	<div class="border border-border-light dark:border-border-dark shadow rounded-lg overflow-hidden">

		<div
			class="flex bg-gray-200 dark:bg-border-dark py-3 px-5"
			v-if="$slots['card-header-start'] || $slots['card-header-end']"
		>

			<div
				v-if="$slots['card-header-start']"
				class="w-full text-gray-700 dark:text-white"
			>

				<slot name="card-header-start"></slot>

			</div>

			<div
				v-if="$slots['card-header-end']"
				class="flex"
			>

				<slot name="card-header-end"></slot>

			</div>

		</div>

		<div class="p-5">

			<slot name="card-content" />

			<slot />

		</div>

	</div>

</template>