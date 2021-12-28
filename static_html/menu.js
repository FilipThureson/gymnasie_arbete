var quotes = [
  '“Failure is simply the opportunity to begin again, this time more intelligently.” -Henry Ford',
  '“A person who never made a mistake never tried anything new.” -Albert Einstein',
  '“Darkness cannot drive out darkness; only light can do that. Hate cannot drive out hate; only love can do that.” -Martin Luther King, Jr.',
  '“Kindness is the language which the deaf can hear and the blind can see.” -Mark Twain',
  '“Our greatest fear should not be of failure but of succeeding at things in life that don’t really matter.” -Francis Chan'

]

function newQuote() {
  var randomQuote = Math.floor(Math.random() * (quotes.length));
  document.getElementById('quoteDisplay').innerHTML = quotes[randomQuote];
}
