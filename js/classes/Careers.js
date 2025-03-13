export default class Careers {
  constructor() {
    let url = 'https://api.lever.co/v0/postings/frameworkhomeownership?skip=0&limit=10&mode=json';
    let pageUrl = window.location.href;
    let trackingPrefix = '?lever-'
    this.leverParameter = '';

    if (!$('#jobs-container .jobs-list').length) {
      return;
    }

    if (pageUrl.indexOf(trackingPrefix) >= 0) {
      let pageUrlSplit = pageUrl.split(trackingPrefix);
      this.leverParameter = '?lever-' + pageUrlSplit[1];
    }

    $.ajax({
      dataType: 'json',
      url: url,
      success: (data) => {
        this.createJobs(data);
      }
    });

    $('#jobs-container').on('click', '.job', function () {
      let link = $(this).data('link');
      window.location.href = link;
    });
  }

  createJobs(_data) {
    for (let i = 0; i < _data.length; i++) {
      let posting = _data[i];
      let title = posting.text;
      let description = posting.description;
      let shortDescription = $.trim(description).substring(0, 250).replace('\n', ' ') + '...';
      let location = posting.categories.location;
      let commitment = posting.categories.commitment;
      let team = posting.categories.team;
      let link = posting.hostedUrl + this.leverParameter;

      $('#jobs-container .jobs-list').append(
        '<div data-link="' + link + '" class="job ' + team + ' ' + location + ' ' + commitment + '">' +
        '<h2 class="job-title" href="' + link + '"">' + title + '</h2>' +
        '<div class="tags"><span>' + team + '</span><span>' + location + '</span><span>' + commitment + '</span></div>' +
        '</div>');
      }
    }
  }

  jQuery(document).ready(function() {
    new Careers();
  });
