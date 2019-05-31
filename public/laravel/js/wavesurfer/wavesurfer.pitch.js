(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module unless amdModuleId is set
    define(["wavesurfer"], function (a0) {
      return (factory(a0));
    });
  } else if (typeof exports === 'object') {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like environments that support module.exports,
    // like Node.
    module.exports = factory(require("wavesurfer.js"));
  } else {
    factory(WaveSurfer);
  }
}(this, function (WaveSurfer) {

'use strict';

WaveSurfer.Spectrogram = {

  
    init: function (params) {
		
        this.params = params;
        var wavesurfer = this.wavesurfer = params.wavesurfer;

        if (!this.wavesurfer) {
            throw Error('No WaveSurfer instance provided');
        }

        this.frequenciesDataUrl = params.frequenciesDataUrl;	
		
		this.frequencies=params.frequencies;
		
		if (this.frequencies==null) {
            this.loadFrequenciesData(this.frequenciesDataUrl);
        }
        var drawer = this.drawer = this.wavesurfer.drawer;

        this.container = 'string' == typeof params.container ?
            document.querySelector(params.container) : params.container;

        if (!this.container) {
            throw Error('No container for WaveSurfer spectrogram');
        }

        this.width = drawer.width;
        this.pixelRatio = this.params.pixelRatio || wavesurfer.params.pixelRatio;
        
        this.height = params.height;
        this.noverlap = params.noverlap;
        this.windowFunc = params.windowFunc;
        this.alpha = params.alpha;		
		this.waveColor = params.waveColor;
		this.selected_track=-1;
		
		this.hide();
        this.createWrapper();
        this.createCursor();
        this.createCanvas();
        
      
        drawer.wrapper.addEventListener('scroll', function (e) {
            this.updateScroll(e);
        }.bind(this));
        
        wavesurfer.on('redraw', this.render.bind(this));
        wavesurfer.on('destroy', this.destroy.bind(this));
		wavesurfer.on('zoom', this.zoom.bind(this));
		wavesurfer.on('audioprocess', this.updateProgress.bind(this));
		
		
    },

    destroy: function () {
        //this.unAll();
        if (this.wrapper) {
            this.wrapper.parentNode.removeChild(this.wrapper);
            this.wrapper = null;
            this.frequencies=null;
        }
    },

    createWrapper: function () {
        var prevSpectrogram = this.container.querySelector('pitch');
        if (prevSpectrogram) {
            this.container.removeChild(prevSpectrogram);
        }

        // if labels are active
        if (this.params.labels) {
            var specLabelsdiv = document.createElement('div');
            specLabelsdiv.setAttribute('id', 'specLabels');
            this.drawer.style(specLabelsdiv, {
                left: 0,
                position: 'absolute',
                zIndex: 9
            });
            specLabelsdiv.innerHTML = '<canvas></canvas>';
            this.wrapper = this.container.appendChild(
                specLabelsdiv
            );
            // can be customized in next version
           
        }      
         // cursor
        
		var curssdiv = document.createElement('div');
		curssdiv.setAttribute('id', 'cursor');
		this.drawer.style(curssdiv, {
			left: 0,
			position: 'absolute',
			zIndex: 9
		});
		curssdiv.innerHTML = '<canvas></canvas>';
		this.wrapper = this.container.appendChild(
			curssdiv
		);
        
        this.cursor=curssdiv;    

        var wsParams = this.wavesurfer.params;

        var specView = document.createElement('pitch');
        // if labels are active
        if (this.params.labels) {
            this.drawer.style(specView, {
                left: 0,
                position: 'relative'
            });
        }
        this.wrapper = this.container.appendChild(
            specView
        );
        this.drawer.style(this.wrapper, {
            display: 'block',
            position: 'relative',
            userSelect: 'none',
            webkitUserSelect: 'none',
            height: this.height + 'px'
        });

        if (wsParams.fillParent || wsParams.scrollParent) {
            this.drawer.style(this.wrapper, {
                width: '100%',
                overflowX: 'hidden',
                overflowY: 'hidden'
            });
        }

        var my = this;
        this.wrapper.addEventListener('click', function (e) {
            e.preventDefault();
            var relX = 'offsetX' in e ? e.offsetX : e.layerX;
            my.fireEvent('click', (relX / my.scrollWidth) || 0);
        });
    },

    createCanvas: function () {
        var canvas = this.canvas = this.wrapper.appendChild(
          document.createElement('canvas')
        );

        this.spectrCc = canvas.getContext('2d');

        this.wavesurfer.drawer.style(canvas, {
            position: 'absolute',
            background: '#F8F8F8',
            zIndex: 4
        });
    },

    render: function () {
        this.updateCanvasStyle();  
        this.drawSpectrogram(this.frequencies,this); //brabudu
        
    },
    hide: function () {
		this.container.hidden=true;
	},
	show: function () {
		this.container.hidden=false;
	},
	zoom: function () {
		//this.width=this.wavesurfer.drawer.width;
		//this.updateCanvasStyle();
		this.render();
		this.updateProgress(this.wavesurfer.getCurrentTime());
		this.cursor.hidden=false;
	},

    updateCanvasStyle: function () {
		this.width=this.wavesurfer.drawer.width;
        var width =Math.round(this.width / this.pixelRatio) + 'px';
        this.canvas.width = this.width;
        this.canvas.height = this.height;
        this.canvas.style.width = width;
        this.canvas.style.height = this.height+'px';
		
    },
    createCursor: function () {
		var cLabel = document.querySelectorAll('#cursor canvas')[0].getContext('2d');
        document.querySelectorAll('#cursor canvas')[0].height = this.height;
        document.querySelectorAll('#cursor canvas')[0].width = 2;

        cLabel.fillStyle = 'red';
        cLabel.fillRect(0, 0, 2, this.height);
        cLabel.fill();
	},
	selectTrack: function (track) {
		this.selected_track=this.tracks.indexOf(track);
		this.render();
	},
	seekAndCenter: function (p) {			
		this.updateScrollNow(p);
		this.updateProgress(p);
		this.cursor.hidden=false;
		
	},
    drawSpectrogram: function(frequenciesData, my) {
        const spectrCc = my.spectrCc;
        const length = my.wavesurfer.backend.getDuration();
        const height = my.height;
        const pixels = frequenciesData;
        const heightFactor = 2;
		const width=my.wavesurfer.drawer.width;
		const widthFactor=width/(frequenciesData[0].length);
        let i;
        let j;
        
        // calculu min e max
        const max=my.max;
        const min=my.min;
        	
		var scale=height/(max-min);
			
        for (i = 0; i < pixels.length; i++) {
			my.spectrCc.beginPath();
            my.spectrCc.strokeStyle = this.waveColor[i];
            if (i==my.selected_track) my.spectrCc.lineWidth=3; 
            else {
				my.spectrCc.lineWidth=1; 
			}
            my.spectrCc.moveTo(widthFactor/2,height);
            for (j = 1; j < pixels[i].length; j++) {
				if (pixels[i][j]==-999) {				
					my.spectrCc.stroke();
					my.spectrCc.moveTo((j+0.5)*widthFactor,(max-pixels[i][j+1])*scale);
				} else {
					my.spectrCc.lineTo((j+0.5)*widthFactor, (max-pixels[i][j])*scale);
				}
			}
            my.spectrCc.stroke();
        }
    },

 
    loadFrequenciesData: function (url) {
        var my = this;

        var ajax = WaveSurfer.util.ajax({ url: url });

        ajax.on('success', function(data) { 
			my.frequencies=data.data;
			my.tracks=data.traccia;					
			console.log("Ajax success");
			my.calculateScale(my.frequencies,my);
			my.render();		
			my.loadLabels('rgba(88,88,88,0.4)', '12px', '10px', '', '#fff', '#f7f7f7', 'center', '#specLabels');
			my.show();
			console.log("immoi");
			my.updateProgress(0);
			 });
        ajax.on('error', function (e) {
			//my.fireEvent('error', 'XHR error: ' + e.target.statusText);
			
			my.hide();
        });

        return ajax;
    },
	calculateScale: function(frequenciesData, my) {
		
		const pixels = frequenciesData;
		var min=1000;
        var max=-999;
        
        let i;
        let j;
        
        for (i = 0; i < pixels.length; i++) {
			for (j = 1; j < pixels[i].length; j++) {
				if (pixels[i][j]!=-999) {
					if (max<pixels[i][j]) max=pixels[i][j];
					if (min>pixels[i][j]) min=pixels[i][j];
				}
			}
		}
		
		//Margini
				
		var margin=(max-min)/10;
		max+=margin;
		min-=margin;
		my.min=min;
		my.max=max;
	
	},
	/*
    freqType: function (freq) {
        return (freq >= 1000 ? (freq / 1000).toFixed(1) : Math.round(freq));
    },

    unitType: function (freq) {
        return (freq >= 1000 ? 'KHz' : 'Hz');
    },
*/
    loadLabels: function (bgFill, fontSizeFreq, fontSizeUnit, fontType, textColorFreq, textColorUnit, textAlign, container) {
       // var frequenciesHeight = this.height;
        var bgFill = bgFill || 'rgba(98,98,98,0.2)';
        var fontSizeFreq = fontSizeFreq || '12px';
        var fontSizeUnit = fontSizeUnit || '10px';
        var fontType = fontType || 'Helvetica';
        var textColorFreq = textColorFreq || '#0ff';
        var textColorUnit = textColorUnit || '#0ff';
        var textAlign = textAlign || 'center';
        var container = container || '#specLabels';
        var getMaxY = this.height;//frequenciesHeight;// || 512;
        //var labelIndex = 5 * (getMaxY / 256);
        var range=parseInt(this.max)-parseInt(this.min);
        console.log("range :"+range);
        var nmin=parseInt(this.min+0.5);
        console.log("width :"+this.wavesurfer.container.clientWidth);
        console.log("range :"+range);
        console.log("min :"+nmin);
        var freqStart = 0;
        //var step = ((this.wavesurfer.backend.ac.sampleRate / 2) - freqStart) / labelIndex;
		var step=getMaxY/range;
		console.log("step :"+step);
        var cLabel = document.querySelectorAll(container+' canvas')[0].getContext('2d');
        document.querySelectorAll(container+' canvas')[0].height = this.height;
        document.querySelectorAll(container+' canvas')[0].width = this.wavesurfer.drawer.width;

		console.log("maxy :"+getMaxY);
        cLabel.fillStyle = bgFill;
        cLabel.fillRect(0, 0, 55, getMaxY);
        cLabel.fill();
        
        var step2=parseInt(range/12)+1;
        console.log(step);

        for (var i = 1; i <= range; i+=step2) {
            cLabel.textAlign = textAlign;
            cLabel.textBaseline = 'middle';
           
            var label=i+nmin;
            
            var x = 40;
            var yLabelOffset = 2;
        
			
			cLabel.fillStyle = textColorFreq;
			
			cLabel.font = fontSizeFreq + ' ' + fontType;
			cLabel.fillText(label, x, getMaxY - i*step  + yLabelOffset);
			cLabel.strokeStyle=bgFill;
			cLabel.beginPath();
			cLabel.moveTo(55, getMaxY - i*step  + yLabelOffset);
			cLabel.lineTo(this.wavesurfer.drawer.width, getMaxY - i*step  + yLabelOffset);
			cLabel.stroke();
			
			
        }
        
        cLabel.save();
		
		 cLabel.rotate(-Math.PI/2);
		 cLabel.textAlign = "center";
		 cLabel.fillText("Semitones (Ref=100 Hz)", -getMaxY/2, 10);
		 cLabel.restore();
                    
    },

    updateScroll: function(e) {
		this.updateScrollNow(e.target.scrollLeft);
	},
	updateScrollNow: function (sl) {
		//this.width=this.wavesurfer.drawer.width;
      this.wrapper.scrollLeft = sl;
		var pos=this.wavesurfer.getCurrentTime()/this.pixelRatio/this.wavesurfer.getDuration()*this.width;
		if (((pos-this.wrapper.scrollLeft)>=0)&&(pos-this.wrapper.scrollLeft<this.container.clientWidth))
		{
			this.cursor.style.left=(pos-this.wrapper.scrollLeft+this.wrapper.offsetLeft)+'px';
			this.cursor.hidden=false;
		}
		else {
			this.cursor.hidden=true;
			
		}
	  
    } ,
    updateProgress: function (p) {
		//this.width=this.wavesurfer.drawer.width;
		var pos=p/this.wavesurfer.getDuration()/this.pixelRatio*this.width+this.wrapper.offsetLeft;
		this.cursor.style.left=(pos-this.wrapper.scrollLeft)+'px';
		
	}
    
     

};

WaveSurfer.util.extend(WaveSurfer.Spectrogram, WaveSurfer.Observer);


}));
