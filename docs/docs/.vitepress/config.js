module.exports = {
  title: 'Twig Profiler Plugin Documentation',
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
    repo: 'nystudio107/craft-twigprofiler',
    docsDir: 'docs/docs',
    docsBranch: 'v1',
    algolia: {
      appId: 'V60OC8MPVK',
      apiKey: 'f0f7f91f8388d5b8d8c7f78dbcc4ea97',
      indexName: 'nystudio107-twig-profiler'
    },
    editLinks: true,
    editLinkText: 'Edit this page on GitHub',
    lastUpdated: 'Last Updated',
    sidebar: 'auto',
  },
};
