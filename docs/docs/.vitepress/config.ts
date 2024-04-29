import {defineConfig} from 'vitepress'

export default defineConfig({
  title: 'Twig Profiler Plugin',
  description: 'Documentation for the Twig Profiler plugin',
  base: '/docs/twig-profiler/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    socialLinks: [
      {icon: 'github', link: 'https://github.com/nystudio107'},
      {icon: 'twitter', link: 'https://twitter.com/nystudio107'},
    ],
    logo: '/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-twigprofiler/edit/develop-v5/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: 'V60OC8MPVK',
      apiKey: 'f0f7f91f8388d5b8d8c7f78dbcc4ea97',
      indexName: 'nystudio107-twig-profiler',
      searchParameters: {
        facetFilters: ["version:v5"],
      },
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [],
    nav: [
      {text: 'Home', link: 'https://nystudio107.com/plugins/twig-profiler'},
      {text: 'Store', link: 'https://plugins.craftcms.com/twig-profiler'},
      {text: 'Changelog', link: 'https://nystudio107.com/plugins/twig-profiler/changelog'},
      {text: 'Issues', link: 'https://github.com/nystudio107/craft-twigprofiler/issues'},
      {
        text: 'v5', items: [
          {text: 'v5', link: '/'},
          {text: 'v4', link: 'https://nystudio107.com/docs/twig-profiler/v4/'},
          {text: 'v1', link: 'https://nystudio107.com/docs/twig-profiler/v1/'},
        ],
      },
    ]
  },
});
