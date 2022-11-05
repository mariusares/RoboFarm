import javax.swing.*;
import java.awt.*;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.Console;

/**
 * We can think of a JFrame as a window
 * By extending (inheriting from) the class javax.swing.JFrame we can
 * define what goes into our window - in this case a single JPanel which is
 * a component container for GUI elements.
 */
public class CustomWindow extends JFrame {

    private ShapesManager shapesManager;
    private CustomPanel mainPanel;
    public CustomWindow(ShapesManager shapesManager)
    {
        this.shapesManager = shapesManager;
        mainPanel = new CustomPanel(shapesManager);

        //add our new panel to the frame

        add(mainPanel, BorderLayout.CENTER);
        //set the dimensions of the frame/window
        setSize(Consts.FRAME_WIDTH, Consts.FRAME_HEIGHT);
    }
}