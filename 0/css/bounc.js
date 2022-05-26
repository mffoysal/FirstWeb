var Dial = function(container){
    this.container = container;
    this.size = this.container.dataset.size;
    this.strokewidth = this.size / 8;
    this.radius = (this.size / 2) - (this.strokewidth / 2);
    this.value = this.container.dataset.value;
    this.direction = this.container.dataset.arrow;
    this.svg;
    this.defs;
    this.slice;
    this.overlay;
    this.text;
    this.arrow;
    this.create();
}
Dial.prototype.create = function(){
    this.createSvg();
    this.createDefs();
    this.createSlice();
    this.createOverlay();
    this.createText();
    this.createArrow();
    this.container.appendChild(this.svg);

}
Dial.prototype.createSvg = function() {
    var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute('width', this.size + 'px');
    svg.setAttribute('height', this.size + 'px');
    this.svg = svg;
};

Dial.prototype.createDefs = function() {
    var defs = document.createElementNS("http://www.w3.org/2000/svg", "defs");
    var linearGradient = document.createElementNS("http://www.w3.org/2000/svg", "linearGradient");
    linearGradient.setAttribute('id', 'gradient');
    var stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
    stop1.setAttribute('stop-color', '#6e4ae2');
    stop1.setAttribute('offset', '0%');
    linearGradient.appendChild(stop1);
    var stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
    stop2.setAttribute('stop-color', '#78f8ec');
    stop2.setAttribute('offset', '100%');
    linearGradient.appendChild(stop2);
    var linearGradientBackground = document.createElementNS("http://www.w3.org/2000/svg", "background");
    linearGradientBackground.setAttribute('id', 'gradient-background');
    var stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
    stop1.setAttribute('stop-color', 'rgba(0, 0, 0.2)');
    stop1.setAttribute('offset', '0%');
    linearGradientBackground.appendChild(stop1);
    var stop2 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
    stop2.setAttribute('stop-color', 'rgba(0, 0, 0.2)');
    stop2.setAttribute('offset', '1000%');
    linearGradientBackground.appendChild(stop2);
    defs.appendChild(linearGradient);
    defs.appendChild(linearGradientBackground);
    this.svg.appendChild(defs);
    this.defs = defs;
}
Dial.prototype.createSlice = function() {
    var slice = document.createElementNS("http://www.w3.org/2000/svg", "path");
    slice.setAttribute('fill', 'none');
    slice.setAttribute('stroke', 'url(#gradient');
    slice.setAttribute('stroke-width', this.strokewidth);
    slice.setAttribute('transform', 'translate('+ this.strokewidth / 2 + ', ' +  this.strokewidth / 2 + ')');
    slice.setAttribute('class', 'animation-draw');
    this.svg.appendChild(slice);
    this.slice = slice;
}

Dial.prototype.createOverlay = function() {
    var r = this.size - (this.size / 2) - this.strokewidth / 2;
    var circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
    circle.setAttribute('cx', this.size / 2);
    circle.setAttribute('cy', this.size / 2);
    circle.setAttribute('r', r);
    circle.setAttribute('fill', 'url(#gradient-background');
    this.svg.appendChild(circle);
    this.overlay = circle;
    
}
Dial.prototype.createText = function() {
    var fontSize = this.size / 3.5;
    var text = document.createElementNS("http://www.w3.org/2000/svg", "text");
    text.setAttribute('x', (this.size / 2) + this.size / 7.5);
    text.setAttribute('y', (this.size / 2) + this.size / 4);
    text.setAttribute('r', r);
    text.setAttribute('font-family', "Century Gothic, Lato");
    text.setAttribute('font-family', fontSize);
    text.setAttribute('fill', '#78f8ec');
    text.setAttribute('text-anchor', 'middle');
    var tspanSize = fontSize / 3;
    text.innerHTML = 0 + '<tspan font-size="' + tspanSize + '" dy="' + -tspanSize * 1.2 + '">%<tspanSize>';
    this.svg.appendChild(text);
    this.text = text;
}
Dial.prototype.createArrow = function() {
    var arrowSize = this.size / 10;
    var arrowYOffset, m;
    if(this.direction === 'up') {
        arrowYOffset = arrowSize / 2;
        m = -1;
    }
    else if(this.direction === 'down') {
        arrowYOffset = 0;
        m = 1;
    }
    var arrowPosX = ((this.size / 2) - arrowSize / 2);
    var arrowPosY = (this.size - this.size / 3) + arrowYOffset;
    var arroDOffset = m * (arrowSize / 1.5);
    var arrow = document.createElementNS("http://www.w3.org/2000/svg", "path");

}
