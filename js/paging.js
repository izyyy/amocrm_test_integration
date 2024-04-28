// JavaScript Document
$('#pagination-demo').twbsPagination({

  totalPages: 5,
  // the current page that show on start
  startPage: 1,
  // maximum visible pages
  visiblePages: 5,
  initiateStartPageClick: true,
  // template for pagination links

  href: false,
  // variable name in href template for page number

  hrefVariable: '{{number}}',
  // Text labels

  first: 'First',
  prev: 'Previous',
  next: 'Next',
  last: 'Last',
  // carousel-style pagination
})